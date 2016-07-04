INSERT INTO `radgroupreply` 
        (
            `id` ,
            `groupname` ,
            `attribute` ,
            `op` ,
            `value` 
        )
        VALUES (
            NULL , 
            'testservice', 
            'Ascend-Xmit-Rate', 
            ':=', 
            '524288'
        ), 
        (
            NULL , 
            'testservice', 
            'Ascend-Data-Rate', 
            ':=', 
            '131072'
        ), 
        (
            NULL , 
            'testservice', 
            'Framed-Pool', 
            ':=', 
            'internet'
        );

