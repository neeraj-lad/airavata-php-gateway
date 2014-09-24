/*
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
*/
package org.apache.airavata.gfac.core.monitor;

import java.io.ByteArrayOutputStream;
import java.io.ObjectOutputStream;
import java.util.Calendar;

import org.apache.airavata.common.utils.AiravataUtils;
import org.apache.airavata.common.utils.MonitorPublisher;
import org.apache.airavata.common.utils.listener.AbstractActivityListener;
import org.apache.airavata.messaging.core.Publisher;
import org.apache.airavata.model.messaging.event.*;
import org.apache.airavata.model.messaging.event.TaskIdentity;
import org.apache.airavata.model.workspace.experiment.TaskDetails;
import org.apache.airavata.model.workspace.experiment.TaskState;
import org.apache.airavata.registry.cpi.Registry;
import org.apache.airavata.registry.cpi.RegistryModelType;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import com.google.common.eventbus.Subscribe;

public class AiravataTaskStatusUpdator implements AbstractActivityListener {
    private final static Logger logger = LoggerFactory.getLogger(AiravataTaskStatusUpdator.class);
    private Registry airavataRegistry;
    private MonitorPublisher monitorPublisher;
    private Publisher publisher;
    
    public Registry getAiravataRegistry() {
        return airavataRegistry;
    }

    public void setAiravataRegistry(Registry airavataRegistry) {
        this.airavataRegistry = airavataRegistry;
    }
//
//    @Subscribe
//    public void setupTaskStatus(TaskStatusChangeRequest taskStatus){
//    	try {
//			updateTaskStatus(taskStatus.getIdentity().getTaskId(), taskStatus.getState());
//			logger.debug("Publishing task status for "+taskStatus.getIdentity().getTaskId()+":"+taskStatus.getState().toString());
//			monitorPublisher.publish(new TaskStatusChangedEvent(taskStatus.getIdentity(),taskStatus.getState()));
//		} catch (Exception e) {
//            logger.error("Error persisting data" + e.getLocalizedMessage(), e);
//		}
//    }

    @Subscribe
    public void setupTaskStatus(JobStatusChangeEvent jobStatus){
    	TaskState state=TaskState.UNKNOWN;
    	switch(jobStatus.getState()){
    	case ACTIVE:
    		state=TaskState.EXECUTING; break;
    	case CANCELED:
    		state=TaskState.CANCELED; break;
    	case COMPLETE:
    		state=TaskState.COMPLETED; break;
    	case FAILED:
    		state=TaskState.FAILED; break;
    	case HELD: case SUSPENDED: case QUEUED:
    		state=TaskState.WAITING; break;
    	case SETUP:
    		state=TaskState.PRE_PROCESSING; break;
    	case SUBMITTED:
    		state=TaskState.STARTED; break;
    	case UN_SUBMITTED:
    		state=TaskState.CANCELED; break;
    	case CANCELING:
    		state=TaskState.CANCELING; break;
		default:
			break;
    	}
    	try {
			updateTaskStatus(jobStatus.getJobIdentity().getTaskId(), state);
			logger.debug("Publishing task status for "+jobStatus.getJobIdentity().getTaskId()+":"+state.toString());
            TaskIdentity taskIdentity = new TaskIdentity(jobStatus.getJobIdentity().getTaskId(),
                                                         jobStatus.getJobIdentity().getWorkflowNodeId(),
                                                         jobStatus.getJobIdentity().getExperimentId());
            monitorPublisher.publish(new TaskStatusChangeEvent(state, taskIdentity));
            TaskStatusChangeEvent changeEvent = new TaskStatusChangeEvent(state, taskIdentity);
            Message message = new Message();
            ByteArrayOutputStream baos = new ByteArrayOutputStream();
            ObjectOutputStream oos = new ObjectOutputStream(baos);
            oos.writeObject(changeEvent);
            message.setEvent(baos.toByteArray());
            message.setMessageType(MessageType.TASK);
            message.setMessageLevel(MessageLevel.INFO);
            message.setMessageId(AiravataUtils.getId("TASK"));
            publisher.publish(message);

        } catch (Exception e) {
            logger.error("Error persisting data" + e.getLocalizedMessage(), e);
		}
    }
    
    public  void updateTaskStatus(String taskId, TaskState state) throws Exception {
		logger.debug("Updating task status for "+taskId+":"+state.toString());
    	TaskDetails details = (TaskDetails)airavataRegistry.get(RegistryModelType.TASK_DETAIL, taskId);
        if(details == null) {
            details = new TaskDetails();
            details.setTaskID(taskId);
        }
        org.apache.airavata.model.workspace.experiment.TaskStatus status = new org.apache.airavata.model.workspace.experiment.TaskStatus();
        status.setExecutionState(state);
        status.setTimeOfStateChange(Calendar.getInstance().getTimeInMillis());
        details.setTaskStatus(status);
        airavataRegistry.update(RegistryModelType.TASK_DETAIL, details, taskId);
    }

	public void setup(Object... configurations) {
		for (Object configuration : configurations) {
			if (configuration instanceof Registry){
				this.airavataRegistry=(Registry)configuration;
			} else if (configuration instanceof MonitorPublisher){
				this.monitorPublisher=(MonitorPublisher) configuration;
			} else if (configuration instanceof Publisher){
                this.publisher=(Publisher) configuration;
            }
        }
	}
}
