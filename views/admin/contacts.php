<?php   
    $data = new ContactController();
    $contacts = $data->getAll();    


?>
<div class="col py-3">
<div class="content py-3">
            <div class="container-fluid ">
                <table class="table table-success table-bordered table-striped">
                    <h3 class="font-weight-bold my-4">Contacts</h3>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Send at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contacts as $contact) :?>
                        <tr>
                            <td><?php echo $contact["username"];?></td>
                            <td><?php echo $contact["email"];?></td>
                            <td><?php echo $contact["message"];?></td>
                            <td><?php echo $contact["send_at"];?></td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
