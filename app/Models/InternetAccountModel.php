<?php

namespace App\Models;

use CodeIgniter\Model;

class InternetAccountModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'internet_account';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['no','name','type','provider','branch','circuit_no','plan_amount','plan_type','date_installed','details'];

}
