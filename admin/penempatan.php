
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h4 mb-0 text-gray-800 border-bottom">PENEMPATAN</h1>
                            <!-- ditambahin icon surat di kiri tulisannya -->
                            <div>       
                            </div>
                        </div>
    
                        <!-- DataTables Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                              <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                <a href="index.php?page=add-kode-arsip" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah</a>
                                <?php  }elseif ($_SESSION['status'] = 'USER') {
                                    echo " - ";
                                  } ?>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-bordered mt-4 mb-4" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Penempatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                              $no=1;
    
                                              $dt    = mysqli_query($mysqli, "SELECT * FROM tb_penempatan");
    
                                              while($data = mysqli_fetch_array($dt)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['nama_penempatan'] ?></td>
                                                
                                                <td>
                                                  <ul class="list-inline m-0">
                                                  
                                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#editModal".$no ?>">
                                                      <button class="btn btn-success btn-sm rounded-3 mt-1" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i> Edit</button>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                      <button class="confirmation btn btn-danger btn-sm rounded-3 mt-1" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                                    </li>
                                                    
                                                </ul>
                                                </td>
                                            </tr>
                                            <!-- Modal Edit -->
                                            
    
                                            <!-- Modal Delete -->
                                            <!-- Modal DELETE DATA -->
                                            <div class="modal fade" id="<?php echo "deleteModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModal">Yakin ingin menghapus data ini?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Klik "Hapus" jika anda yakin ingin menghapus data ini.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <a class="btn btn-danger" href="controller.php?page=penempatan&action=delete&id=<?php echo $data['id'] ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- MODAL EDIT -->
                                            <div class="modal fade" id="<?php echo "editModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
    
                                                  <div class="modal-header border-bottom-secondary">
                                                    <h5 class="modal-title text-gray-900">Edit - Penempatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
    
                                                  <form action="controller.php?page=penempatan&action=update" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body text-gray-900">
                                                      <div class="form-group">
                                                        <label for="data2">Nama Penempatan</label>
                                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                        <input type="text" class="form-control" name="nama_penempatan" required="required" value="<?php echo $data['nama_penempatan'] ?>">
                                                      </div>
                                                      
                                                    </div>
                                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                      <button type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                  </form>
    
                                                </div>
                                              </div>
                                            </div>
                                            <?php $no++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
    
                <!-- </div> -->
                
    
                <!-- Modal ADD DATA -->
                <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
    
                      <div class="modal-header border-bottom-secondary">
                        <h5 class="modal-title text-gray-900">Tambah Penempatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
    
                      <form action="controller.php?page=penempatan&action=insert" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">
                          <div class="form-group">
                            <label for="data2">Nama Penempatan</label>
                            <input type="text" class="form-control" name="nama_penempatan" required="required">
                          </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
    
                    </div>
                  </div>
                </div>
                
    