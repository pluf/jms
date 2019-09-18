<?php

class JobState
{
    public const init = "new";
    public const wait = "ready";
    public const inProgress = "in-progress";
    public const stopped = "stopped";
    public const error = "error";
    public const complete = "done";
}

