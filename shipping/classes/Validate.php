<?php
class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array())
	{
		foreach($items as $item => $rules)
		{
			foreach($rules as $rule => $rule_value)
			{
				$value = trim($source[$item]);

				if($rule === 'required' && empty($value))
				{
					$this->addError("Please fill up required fields(*)");
				} elseif(!empty($value)) {
					switch($rule)
					{
						case 'min':
						if(strlen($value) < $rule_value)
						{
							$this->addError("{$item} must be minimum of {$rule_value} character(s)");
						}
						break;
						case 'max':
							if(strlen($value) > $rule_value)
							{
								$this->addError("{$item} is maximum of {$rule_value} character(s)");
							}
						break;
						case 'matches':
							if($value != $source[$rule_value])
							{
								$this->addError("{$rule_value} didn't match {$item}");
							}
						break;
						//case 'unique':
					}
				}
				if(empty($this->_errors))
				{
					$this->_passed = true;
				}
				return $this;
			}
		}
	}

	public function addError($error)
	{
		$this->_errors[] = $error;
	}

	public function errors()
	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}
}