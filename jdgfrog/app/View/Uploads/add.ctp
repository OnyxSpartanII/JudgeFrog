<!-- File: /app/View/Uploads/index.ctp -->

<h1>Upload a CSV to Database</h1>
<?php
echo $this->Form->create('Uploads', array('type' => 'file'));
echo $this->Form->input('file', array('type' => 'file'));
echo $this->Form->end('Submit');
?>