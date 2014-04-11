<?php

namespace GameServer;

interface iCommand
{
	  public function setGame($game);
	  public function execute();
}
