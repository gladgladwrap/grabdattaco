<?php
	class NameException extends Exceptions {
		
		function __toString() {
			return "Your feedback was not submitted.<br />You wrote your name wrong.<br />"
			. $this->getCode(). ": ". $this->getMessage()."<br />
			 in ". $this->getFile(). " on line ". $this->getLine() . "<br />";
		}
	}
?>