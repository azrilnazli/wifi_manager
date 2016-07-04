INSERT INTO `radcheck` 
                    (
                        `id` ,
                        `username` ,
                        `attribute` ,
                        `op` ,
                        `value` 
                    )
        VALUES (
                        NULL , 
                        'testuser', 
                        'Cleartext-Password', 
                        ':=', 
                        'testpassword'
                ), 
                (
                        NULL , 
                        'testuser', 
                        'Simultaneous-Use', 
                        ':=', 
                        '1'
                );
