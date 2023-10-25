<?php $__env->startSection('title', 'Category Create'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>
        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make("layout.admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-8">
                <?php echo $__env->make("layout.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(\App\Classes\Session::has("delete_success")): ?>
                    <?php echo e(\App\Classes\Session::flash("delete_success")); ?>

                <?php endif; ?>

                <?php if(\App\Classes\Session::has("delete_fail")): ?>
                    <?php echo e(\App\Classes\Session::flash("delete_fail")); ?>

                <?php endif; ?>
                
                <!-- Form_Start -->
                    <form action="<?php echo URL_ROOT . 'admin/category/create'; ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="name" class="form-control" id="name" name="name">
                        </div>

                        <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                        <div class="row no-gutters py-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary english">Create</button>
                            </div>
                        </div>
                    </form>
                <!-- Form_End -->

                <!-- Category List Start -->
                    <ul class="list-group mt-5">
                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="<?php echo URL_ROOT . 'admin/category/all'; ?>" style="text-decoration: none;color:darkblue;"><?php echo e($category->name); ?></a>
                            <span class="float-end">
                                <i class="fa fa-plus text-primary" id="plus" 
                                    onclick="showSubModal('<?php echo e($category->name); ?>','<?php echo e($category->id); ?>')">
                                </i>

                                <i class="fa fa-edit text-warning" onclick="fun('<?php echo e($category->name); ?>','<?php echo e($category->id); ?>')" id="editor"></i>

                                <a href="<?php echo URL_ROOT . "admin/category/$category->id/delete"; ?>">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="mt-3 offset-md-4">
                        <?php echo $pages; ?>

                    </div>
                <!-- Category List Start -->

                <!-- SubCategory List Start -->
                    <ul class="list-group mt-5">
                        <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="<?php echo URL_ROOT . 'admin/category/all'; ?>" style="text-decoration: none;color:darkblue;"><?php echo e($category->name); ?></a>
                            <span class="float-end">

                                <i class="fa fa-edit text-warning" onclick="subCatEdit('<?php echo e($category->name); ?>','<?php echo e($category->id); ?>')" id="editor"></i>

                                <a href="<?php echo URL_ROOT . "admin/subcategory/$category->id/delete"; ?>">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="mt-3 offset-md-4">
                        <?php echo $sub_pages; ?>

                    </div>
                <!-- SubCategory List Start -->
            </div>
        </div>
    </div>

    <!-- Modal Start -->
        <div class="modal" tabindex="-1" id="CategoryUpdateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form_Start -->
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="name" class="form-control" id="edit-name">
                                </div>

                                <input type="hidden" id="edit-token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                                <input type="hidden" id="edit-id">

                                <div class="row no-gutters py-2">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary english" onclick="startEdit(event)">Update</button>
                                    </div>
                                </div>
                            </form>
                        <!-- Form_End -->
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal End -->

    <!-- Sub-Category Create Modal Start -->
        <div class="modal" tabindex="-1" id="SubCategoryCreateModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form_Start -->
                                <form >
                                    <div class="mb-3">
                                        <label for="parent-cat-name" class="form-label">Parent Category</label>
                                        <input type="name" class="form-control" id="parent-cat-name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="sub-cat-name" class="form-label">Sub Category</label>
                                        <input type="name" class="form-control" id="sub-cat-name">
                                    </div>

                                    <input type="hidden" id="sub-cat-token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                                    <input type="hidden" id="parent-cat-id">

                                    <div class="row no-gutters py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary english" onclick="createSubCategory(event)">Create</button>
                                        </div>
                                    </div>
                                </form>
                            <!-- Form_End -->
                        </div>
                    </div>
                </div>
            </div>
    <!-- Sub-Category Create Modal End -->

    <!-- Modal Start -->
        <div class="modal" tabindex="-1" id="SubCategoryEditModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form_Start -->
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="name" class="form-control" id="sub-cat-edit-name">
                                </div>

                                <input type="hidden" id="sub-cat-edit-token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                                <input type="hidden" id="sub-cat-edit-id">

                                <div class="row no-gutters py-2">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary english" onclick="subCatUpdateStart(event)">Update</button>
                                    </div>
                                </div>
                            </form>
                        <!-- Form_End -->
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <script>
            function fun(name,id){
                $("#edit-name").val(name);
                $("#edit-id").val(id);
                $("#CategoryUpdateModal").modal("show");
            }

            function startEdit($e){
                $e.preventDefault();
                var name = $("#edit-name").val();
                var token = $("#edit-token").val();
                var id = $("#edit-id").val();
                $('#CategoryUpdateModal').modal('hide');
                // alert("name is "+name+" token is "+token+" id "+id);
                $.ajax({
                    type:'POST',
                    url:'/E-Commerce/public/admin/category/update',
                    data:{
                        name:name,
                        token:token,
                        id:id
                    },
                    success:function(result){
                        window.location.href = "create";
                        // console.log(result);
                        // alert(result);
                    },
                    error:function(respone){
                        var str = "";
                        var resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }

            function showSubModal(name,id){
                $('#parent-cat-name').val(name);
                $('#parent-cat-id').val(id);
                $('#SubCategoryCreateModal').modal('show');
            }

            function createSubCategory($e){
                $e.preventDefault();
                var name = $('#sub-cat-name').val();
                var token = $('#sub-cat-token').val();
                var parent_cat_id = $('#parent-cat-id').val();
                $('#SubCategoryCreateModal').modal('hide');
                // alert("Name is "+name+" Token is "+token+" id is "+parent_cat_id);
                $.ajax({
                    type:'POST',
                    url:'/E-Commerce/public/admin/subcategory/create',
                    data:{
                        name:name,
                        token:token,
                        parent_cat_id:parent_cat_id
                    },
                    success:function(result){
                        window.location.href = "create";
                        // console.log(result);
                        // alert(result);
                    },
                    error:function(respone){
                        var str = "";
                        var resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }

            function subCatEdit(name,id){
                $("#sub-cat-edit-name").val(name);
                $("#sub-cat-edit-id").val(id);

                $("#SubCategoryEditModal").modal("show");
                // alert("Subcat name is " + name + " Subcat id is " + id);
            }

            function subCatUpdateStart($e){
                $e.preventDefault();
                
                let name = $("#sub-cat-edit-name").val();
                let id = $("#sub-cat-edit-id").val();
                let token = $("#sub-cat-edit-token").val();

                $("#SubCategoryEditModal").modal("hide");

                $.ajax({
                    type:'POST',
                    url:'/E-Commerce/public/admin/subcategory/update',
                    data:{
                        name:name,
                        token:token,
                        id:id
                    },
                    success:function(result){
                        window.location.href = "create";
                        // console.log(result);
                        // alert(result);
                    },
                    error:function(respone){
                        var str = "";
                        var resp = (JSON.parse(respone.responseText));
                        alert(resp.name);
                    }
                });
            }
        </script>
<?php $__env->stopSection(); ?>
    

    
    


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/admin/category/create.blade.php ENDPATH**/ ?>