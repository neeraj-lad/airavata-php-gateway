<?php
namespace Airavata\Model\Messaging\Event;

/**
 * Autogenerated by Thrift Compiler (0.9.1)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


final class MessageLevel {
  const INFO = 0;
  const DEBUG = 1;
  const ERROR = 2;
  const ACK = 3;
  static public $__names = array(
    0 => 'INFO',
    1 => 'DEBUG',
    2 => 'ERROR',
    3 => 'ACK',
  );
}

final class MessageType {
  const EXPERIMENT = 0;
  const TASK = 1;
  const WORKFLOWNODE = 2;
  const JOB = 3;
  static public $__names = array(
    0 => 'EXPERIMENT',
    1 => 'TASK',
    2 => 'WORKFLOWNODE',
    3 => 'JOB',
  );
}

class ExperimentStatusChangeEvent {
  static $_TSPEC;

  public $state = null;
  public $experimentId = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'state',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'experimentId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['experimentId'])) {
        $this->experimentId = $vals['experimentId'];
      }
    }
  }

  public function getName() {
    return 'ExperimentStatusChangeEvent';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->experimentId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ExperimentStatusChangeEvent');
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::I32, 1);
      $xfer += $output->writeI32($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->experimentId !== null) {
      $xfer += $output->writeFieldBegin('experimentId', TType::STRING, 2);
      $xfer += $output->writeString($this->experimentId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class WorkflowIdentity {
  static $_TSPEC;

  public $workflowNodeId = null;
  public $experimentId = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'workflowNodeId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'experimentId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['workflowNodeId'])) {
        $this->workflowNodeId = $vals['workflowNodeId'];
      }
      if (isset($vals['experimentId'])) {
        $this->experimentId = $vals['experimentId'];
      }
    }
  }

  public function getName() {
    return 'WorkflowIdentity';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->workflowNodeId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->experimentId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('WorkflowIdentity');
    if ($this->workflowNodeId !== null) {
      $xfer += $output->writeFieldBegin('workflowNodeId', TType::STRING, 1);
      $xfer += $output->writeString($this->workflowNodeId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->experimentId !== null) {
      $xfer += $output->writeFieldBegin('experimentId', TType::STRING, 2);
      $xfer += $output->writeString($this->experimentId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class WorkflowNodeStatusChangeEvent {
  static $_TSPEC;

  public $state = null;
  public $workflowNodeIdentity = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'state',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'workflowNodeIdentity',
          'type' => TType::STRUCT,
          'class' => '\Airavata\Model\Messaging\Event\WorkflowIdentity',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['workflowNodeIdentity'])) {
        $this->workflowNodeIdentity = $vals['workflowNodeIdentity'];
      }
    }
  }

  public function getName() {
    return 'WorkflowNodeStatusChangeEvent';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->workflowNodeIdentity = new \Airavata\Model\Messaging\Event\WorkflowIdentity();
            $xfer += $this->workflowNodeIdentity->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('WorkflowNodeStatusChangeEvent');
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::I32, 1);
      $xfer += $output->writeI32($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->workflowNodeIdentity !== null) {
      if (!is_object($this->workflowNodeIdentity)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('workflowNodeIdentity', TType::STRUCT, 2);
      $xfer += $this->workflowNodeIdentity->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TaskIdentity {
  static $_TSPEC;

  public $taskId = null;
  public $workflowNodeId = null;
  public $experimentId = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'taskId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'workflowNodeId',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'experimentId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['taskId'])) {
        $this->taskId = $vals['taskId'];
      }
      if (isset($vals['workflowNodeId'])) {
        $this->workflowNodeId = $vals['workflowNodeId'];
      }
      if (isset($vals['experimentId'])) {
        $this->experimentId = $vals['experimentId'];
      }
    }
  }

  public function getName() {
    return 'TaskIdentity';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->taskId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->workflowNodeId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->experimentId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TaskIdentity');
    if ($this->taskId !== null) {
      $xfer += $output->writeFieldBegin('taskId', TType::STRING, 1);
      $xfer += $output->writeString($this->taskId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->workflowNodeId !== null) {
      $xfer += $output->writeFieldBegin('workflowNodeId', TType::STRING, 2);
      $xfer += $output->writeString($this->workflowNodeId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->experimentId !== null) {
      $xfer += $output->writeFieldBegin('experimentId', TType::STRING, 3);
      $xfer += $output->writeString($this->experimentId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TaskStatusChangeEvent {
  static $_TSPEC;

  public $state = null;
  public $taskIdentity = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'state',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'taskIdentity',
          'type' => TType::STRUCT,
          'class' => '\Airavata\Model\Messaging\Event\TaskIdentity',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['taskIdentity'])) {
        $this->taskIdentity = $vals['taskIdentity'];
      }
    }
  }

  public function getName() {
    return 'TaskStatusChangeEvent';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->taskIdentity = new \Airavata\Model\Messaging\Event\TaskIdentity();
            $xfer += $this->taskIdentity->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TaskStatusChangeEvent');
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::I32, 1);
      $xfer += $output->writeI32($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->taskIdentity !== null) {
      if (!is_object($this->taskIdentity)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('taskIdentity', TType::STRUCT, 2);
      $xfer += $this->taskIdentity->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TaskOutputChangeEvent {
  static $_TSPEC;

  public $output = null;
  public $taskIdentity = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'output',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\Airavata\Model\Workspace\Experiment\DataObjectType',
            ),
          ),
        2 => array(
          'var' => 'taskIdentity',
          'type' => TType::STRUCT,
          'class' => '\Airavata\Model\Messaging\Event\TaskIdentity',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['output'])) {
        $this->output = $vals['output'];
      }
      if (isset($vals['taskIdentity'])) {
        $this->taskIdentity = $vals['taskIdentity'];
      }
    }
  }

  public function getName() {
    return 'TaskOutputChangeEvent';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::LST) {
            $this->output = array();
            $_size0 = 0;
            $_etype3 = 0;
            $xfer += $input->readListBegin($_etype3, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $elem5 = null;
              $elem5 = new \Airavata\Model\Workspace\Experiment\DataObjectType();
              $xfer += $elem5->read($input);
              $this->output []= $elem5;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->taskIdentity = new \Airavata\Model\Messaging\Event\TaskIdentity();
            $xfer += $this->taskIdentity->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TaskOutputChangeEvent');
    if ($this->output !== null) {
      if (!is_array($this->output)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('output', TType::LST, 1);
      {
        $output->writeListBegin(TType::STRUCT, count($this->output));
        {
          foreach ($this->output as $iter6)
          {
            $xfer += $iter6->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->taskIdentity !== null) {
      if (!is_object($this->taskIdentity)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('taskIdentity', TType::STRUCT, 2);
      $xfer += $this->taskIdentity->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class JobIdentity {
  static $_TSPEC;

  public $jobId = null;
  public $taskId = null;
  public $workflowNodeId = null;
  public $experimentId = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'jobId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'taskId',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'workflowNodeId',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'experimentId',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['jobId'])) {
        $this->jobId = $vals['jobId'];
      }
      if (isset($vals['taskId'])) {
        $this->taskId = $vals['taskId'];
      }
      if (isset($vals['workflowNodeId'])) {
        $this->workflowNodeId = $vals['workflowNodeId'];
      }
      if (isset($vals['experimentId'])) {
        $this->experimentId = $vals['experimentId'];
      }
    }
  }

  public function getName() {
    return 'JobIdentity';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->jobId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->taskId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->workflowNodeId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->experimentId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('JobIdentity');
    if ($this->jobId !== null) {
      $xfer += $output->writeFieldBegin('jobId', TType::STRING, 1);
      $xfer += $output->writeString($this->jobId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->taskId !== null) {
      $xfer += $output->writeFieldBegin('taskId', TType::STRING, 2);
      $xfer += $output->writeString($this->taskId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->workflowNodeId !== null) {
      $xfer += $output->writeFieldBegin('workflowNodeId', TType::STRING, 3);
      $xfer += $output->writeString($this->workflowNodeId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->experimentId !== null) {
      $xfer += $output->writeFieldBegin('experimentId', TType::STRING, 4);
      $xfer += $output->writeString($this->experimentId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class JobStatusChangeEvent {
  static $_TSPEC;

  public $state = null;
  public $jobIdentity = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'state',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'jobIdentity',
          'type' => TType::STRUCT,
          'class' => '\Airavata\Model\Messaging\Event\JobIdentity',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['jobIdentity'])) {
        $this->jobIdentity = $vals['jobIdentity'];
      }
    }
  }

  public function getName() {
    return 'JobStatusChangeEvent';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->jobIdentity = new \Airavata\Model\Messaging\Event\JobIdentity();
            $xfer += $this->jobIdentity->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('JobStatusChangeEvent');
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::I32, 1);
      $xfer += $output->writeI32($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->jobIdentity !== null) {
      if (!is_object($this->jobIdentity)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('jobIdentity', TType::STRUCT, 2);
      $xfer += $this->jobIdentity->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Message {
  static $_TSPEC;

  public $event = null;
  public $messageId = "DO_NOT_SET_AT_CLIENTS";
  public $messageType = null;
  public $updatedTime = null;
  public $messageLevel = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'event',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'messageId',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'messageType',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'updatedTime',
          'type' => TType::I64,
          ),
        5 => array(
          'var' => 'messageLevel',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['event'])) {
        $this->event = $vals['event'];
      }
      if (isset($vals['messageId'])) {
        $this->messageId = $vals['messageId'];
      }
      if (isset($vals['messageType'])) {
        $this->messageType = $vals['messageType'];
      }
      if (isset($vals['updatedTime'])) {
        $this->updatedTime = $vals['updatedTime'];
      }
      if (isset($vals['messageLevel'])) {
        $this->messageLevel = $vals['messageLevel'];
      }
    }
  }

  public function getName() {
    return 'Message';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->event);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->messageId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->messageType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->updatedTime);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->messageLevel);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Message');
    if ($this->event !== null) {
      $xfer += $output->writeFieldBegin('event', TType::STRING, 1);
      $xfer += $output->writeString($this->event);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->messageId !== null) {
      $xfer += $output->writeFieldBegin('messageId', TType::STRING, 2);
      $xfer += $output->writeString($this->messageId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->messageType !== null) {
      $xfer += $output->writeFieldBegin('messageType', TType::I32, 3);
      $xfer += $output->writeI32($this->messageType);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->updatedTime !== null) {
      $xfer += $output->writeFieldBegin('updatedTime', TType::I64, 4);
      $xfer += $output->writeI64($this->updatedTime);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->messageLevel !== null) {
      $xfer += $output->writeFieldBegin('messageLevel', TType::I32, 5);
      $xfer += $output->writeI32($this->messageLevel);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

$GLOBALS['messagingEvents_CONSTANTS']['DEFAULT_ID'] = "DO_NOT_SET_AT_CLIENTS";


