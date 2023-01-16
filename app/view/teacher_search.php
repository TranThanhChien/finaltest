<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm giáo viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/teacher_search.css">
</head>

<body>
    <div class="container-fluid">
        <div class="teacherSearch">
            <div class="teacherForm">
                <form class="form-horizontal" method="get" class="border border-primary rounded p-5">
                    <div class="form-group row mt-4 justify-content-md-center">
                        <label class="col-sm-2" for="specialized_id">Bộ môn</label>
                        <div class="col-sm-6">
                            <select name="specialized" id="specialized_id" class="form-select">
                                <option selected></option>
                                <?php foreach (constant("SPECIALIZED") as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-4 justify-content-md-center">
                        <label class="col-sm-2" for="teacher_keyword_id">Từ khóa</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="teacher_keyword_id" name="teacher_keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mt-3 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" name="teacher_search" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
                <!-- <form method="post">
                    <div class="teacherForm--wrap d-flex col-8">
                        <div class="teacherForm--wrap__label col-4">
                            <label for="">Chuyên ngành</label>
                        </div>
                        <select name="teacherSpecialized" id="" class="col-8">
                            <option value="0">Toán tin</option>
                            <option value="1">Thiên văn</option>
                            <option value="2">Vật lý địa cầu</option>
                            <option value="3">Hoá hữu cơ</option>
                        </select>
                    </div>
                    <div class="teacherForm--wrap d-flex col-8">
                        <div class="teacherForm--wrap__label col-4">
                            <label for="">Từ khoá</label>
                        </div>
                        <input type="text" class="col-8" name="teacherKey">
                    </div>
                    <div class="teacherForm--wrap d-flex col-8">
                        <div class="teacherForm--wrap__space col-4"></div>
                        <div class="teacherForm--wrap__seacher">
                            <button type="submit" class="btn btn-primary" class="teacherForm--wrap_search" name="teacher_search">Tìm kiếm</button>
                        </div>
                    </div>
                </form> -->
            </div>

            <div class="mt-3">Số bản ghi tìm thấy: <?php print_r(count($row)) ?></div>
            <div class="scheduleData table-responsive col-sm-12" style="height: 300px;">
                <table class="table table-bordered">
                    <colgroup>
                        <col width="50" span="1">
                        <col width="200" span="1">
                        <col width="200" span="1">
                        <col width="300" span="1">
                        <col width="200" span="1">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tên giáo viên</th>
                            <th scope="col">Khoa</th>
                            <th scope="col">Mô tả chi tiết</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        for ($i = 0; $i < count($row); $i++) { ?>

                            <tr>
                                <th scope="row"><?php echo $i + 1; ?></th>
                                <td><?php echo $row[$i]['name']; ?></td>
                                <td><?php echo constant('SPECIALIZED')[$row[$i]['specialized']]; ?></td>
                                <td><?php echo $row[$i]['description']; ?></td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <div>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row[$i]['id']; ?>">
                                                Xoá
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal<?php echo $row[$i]['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="false">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Xoá giáo viên</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn chắc chắn muốn xóa giáo viên <?php echo $row[$i]['name']; ?>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                                        <form method="get">
                                                            <a href="teacher_search.php?delete_teacher=<?php echo $row[$i]['id']; ?>" class="btn btn-danger">Đồng ý</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mx-2">
                                            <form method="get">
                                                <a href="teacher_edit_input.php?edit_teacher=<?php echo $row[$i]['id']; ?>" class="btn btn-primary">Sửa</a>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>