<?php
$baseUrl = '../';
$title = "Quản Lý Feedback";
$url = '../feedback/search_feedback.php';
require_once('../layouts/header.php');

$sql = "select * from Feedback order by status asc, updated_at desc ";
$data = excuteResult($sql);
?>

    <div class="row" style="margin-top: 20px;">
        <h3>Feedback</h3>
        <div class="col-md-12 table-responsive">


            <table class="table table-bordered table-hover" style="margin-top: 20px;">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Họ</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Feedback</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                    <th style="width: 50px"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $index = 0;
                foreach($data as $item) {
                    echo '<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['firstname'].'</td>
					<td>'.$item['lastname'].'</td>
					<td>'.$item['phone_number'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.$item['subject_name'].'</td>
					<td>'.$item['note'].'</td>
					<td>'.$item['updated_at'].'</td>
					<td style="width: 120px">';
                    if($item['status'] == 0) {
                        echo '						<button onclick="markRead('.$item['id'].')" class="btn btn-warning">Đã xem</button>
';
                    }
                    echo'
					</td>
					
				</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function markRead(id) {

            $.post('form_delete.php', {
                'id': id,
                'action': 'mark'
            }, function(data) {
                location.reload()
            })
        }
    </script>

<?php
require_once('../layouts/footer.php');
?>