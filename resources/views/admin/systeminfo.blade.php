<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">O Systemie</div>
        <div class="">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>PARAM</th>
                    <th>VIEW</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>OS</td>
                    <td><?php echo (php_uname($mode='s').' '.php_uname($mode='r'));?></td>
                </tr>
                <tr>
                    <td>Arch</td>
                    <td><?php echo (php_uname($mode='m'));?></td>
                </tr>
                <tr>
                    <td>Host</td>
                    <td><?php echo (php_uname($mode='n'));?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>