<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Batch Upload - Admin Panel | Human Trafficking Data');
    // $this->set('active', 'create_case');
?>
<!-- File: /app/View/Uploads/add.ctp -->

<h1>Upload a CSV to Database</h1>
<?php
echo $this->Form->create('Uploads', array('type' => 'file'));
echo $this->Form->input('file', array('type' => 'file'));
echo $this->Form->end('Submit');
?>