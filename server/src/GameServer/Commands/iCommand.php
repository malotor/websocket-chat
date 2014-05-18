<?php

namespace GameServer\Commands;

interface iCommand
{
	  public function setGame($game);
	  public function setConnection($connection);

	  public function execute();
}
