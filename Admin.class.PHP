<?php
	
	class Admin
	{
		private $id;
		private $name;
		private $password;

		public getId()
		{
			return $this->id;
		}
		public getName()
		{
			return $this->name;
		}
		public getPassword()
		{
			return $this->password;
		}
		public setId($id)
		{
			this->id = $id;
		}
		public setName($name)
		{
			this->name = $name;
		}
		public setPassword($password)
		{
			this->password = $password;
		}
	}
?>
