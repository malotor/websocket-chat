<?php

namespace GameServer;

interface iCommand
{
	  public function setGame($game);
	  public function setConnection($connection);

	  public function execute();
}
