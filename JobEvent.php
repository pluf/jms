<?php

/**
 * @ORM\Entity
 * @ORM\Table(name="jms_job_event")
 */
class JobEvent
{

    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string")
     */
    private $worker;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $job;

    /**
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * TODO: set date time mode
     *
     * @ORM\Column(type="string")
     */
    private $time_stampe;

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return mixed
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     *
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return mixed
     */
    public function getTimeStampe()
    {
        return $this->time_stampe;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param mixed $worker
     */
    public function setWorker($worker)
    {
        $this->worker = $worker;
    }

    /**
     *
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     *
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @param mixed $time_stampe
     */
    public function setTimeStampe($time_stampe)
    {
        $this->time_stampe = $time_stampe;
    }

    /**
     * Fill the object form the input array data
     *
     * @param array $arrayData
     * @return JobEvent
     */
    public static function fromArray($arrayData)
    {
        $event = new JobEvent();
        $event->id = $arrayData['id'];
        $event->name = $arrayData['name'];
        $event->worker = $arrayData['worker'];
        $event->time_stampe = $arrayData['time_stampe'];
        return $event;
    }
}

