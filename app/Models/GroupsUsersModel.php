<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupsUsersModel extends Model
{
  protected $table = 'auth_groups_users';
  protected $allowedFields = ['group_id', 'user_id'];
}
