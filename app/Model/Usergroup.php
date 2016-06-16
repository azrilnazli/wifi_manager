<?php
class Usergroup extends AppModel {
    
    public $hasMany = 'User';
    
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Title is required'
            )
        ),
        
        
        'description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Description is required'
            )
        ),
    
    );

} // Usergroup
