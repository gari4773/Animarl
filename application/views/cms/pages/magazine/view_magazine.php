
<!-- body start -->
<section class="content">
    <div class="container-fluid">
    <!-- Body Copy -->
        <div class="card">
            <div class="header clearfix">
                <div class="row">
                    <div class="col-sm-6  align-items-center">
                        <h2 class="card-inside-title" style="line-height: 30.5px">メールマガジン一覧</h2>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn bg-deep-purple waves-effect" id="register">新規作成</button>
                    </div>
                </div>
            </div>
            <div class="body">
                <!-- maillist start -->
                <div class="wrapper" style="display:flex">
                    <div class="list-group" style="width:40%">
                        <?php for($i=0; $i<=9; $i++) :?>
                            <!-- // $reserve[$i] = "テスト".$i; -->
                            <a href="javascript:void(0);" class="list-group-item<?php echo $i===0?" active": '';?>"><?php echo @$magazine[$i]['mail_subject']?:'未登録'; ?></a>
                        <?php endfor; ?>
                    </div>
                    <div class="panel-group" style="width:60%">
                        <div class="mail-heading">
                            <div class="mail-heading-wrapper">
                                <button type="button" class="btn bg-deep-purple waves-effect" id="send">送信</button>
                                <button type="button" class="btn bg-deep-purple waves-effect" id="update" value=<?php echo @$magazine[0]['mail_magazine_id']?:''?>>更新</button>
                                <button type="button" class="btn bg-deep-purple waves-effect" id="delete" value=<?php echo @$magazine[0]['mail_magazine_id']?:''?>>削除</button>
                            </div>
                            <div class="mail-heading-wrapper">
                                表示名: <span id="sender"><?php echo @$magazine[0]['mail_sender_name']?:''; ?></span>
                            </div>
                            <div class="mail-heading-wrapper">
                                件名: <span id="subject"><?php echo @$magazine[0]['mail_subject']?:''; ?></span>
                            </div>
                            <div class="mail-heading-wrapper">
                                最終送信日: <span id="sended_at"><?php echo @$magazine[0]['mail_sended_at']?:''; ?></span>
                            </div>
                            </div>
                        <div class="mail-body" style="height: 234px; overflow: visible scroll;">
                            <?php echo @$magazine[0]['mail_detail']? str_replace("\n", '<br>' ,$magazine[0]['mail_detail']):''; ?>
                        </div>
                    </div>
                </div>
                <!-- maillist end -->
                <?php
                // $count = 30;
                if($count >= 10) {
                    $total_page = $count/10;
                    // $total_page = floor($count%10);
                    // $count%10 > 1? $total_page++: false;
                } else {
                    $total_page = 1;
                }
                // echo $total_page;
                ?>
                <!-- paging start -->
                <nav class="text-center">
                    <ul class="pagination">
                        <li <?php echo @$_GET['page'] > 1? null:'class="disabled"'?>>
                            <a href="javascript:void(0);">
                                <i class="material-icons">chevron_left</i>
                            </a>
                        </li>
                        <?php if($total_page > 1): ?>
                        <?php for($j=1; $j<=$total_page; $j++): ?>
                        <li>
                            <a href="javascript:void(0);" class=<?php echo $j===1? "waves-effect active":"waves-effect";?>>
                                <?php echo $j ?>
                            </a>
                        </li>
                        <?php endfor; ?>
                        <?php else: ?>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect active">1</a>
                        </li>
                        <?php endif; ?>
                        <li <?php echo $total_page === 1? 'class="disabled"': false;?>>
                            <a href="javascript:void(0);" class="waves-effect">
                                <i class="material-icons">chevron_right</i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- paging end -->
            </div>
        </div>
    </div>
</section>

<section id="modalArea_register" class="modalArea">
    <div id="modalBg_register" class="modalBg"></div>
    <div class="modalmailWrapper">
        <div class="modalContents" id="modalContents_register"></div>
        <div id="closeModal_register" class="closeModal">
            ×
        </div>
        <form id="form">
            <div class="header clearfix" style="margin: 20px 0px">
                <h3 id="modal_title" class="pull-left" style="font-weight: bold; line-height: 37px; margin: 0px">新規メールマガジン作成</h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="mail_sender_name">表示名<span style="color: red; margin-left: 10px">必須</span></label>
                                <input type="text" id="mail_sender_name" class="form-control" placeholder="個人事業主名/法人名" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="mail_subject">件名<span style="color: red; margin-left: 10px">必須</span> </label>
                                <input type="text" id="mail_subject" class="form-control" placeholder="顧客名" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="mail_detail">メール本文<span style="color: red; margin-left: 10px">必須</span></label>
                                <textarea rows=10 id="mail_detail" class="form-control no-resize" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="mail_magazine_id">
                <button type="submit" id="sendResister" class="btn bg-pink waves-effect">
                    登録
                </button>
                <button type="button" id="sendUpdate" class="btn bg-pink waves-effect" style="display:none">
                    更新
                </button>
                <button type="button" class="btn bg-orange waves-effect" id="cancel" style="margin-right: 10px">
                    キャンセル
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="<?php base_url(); ?>assets/cms/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?php base_url(); ?>assets/cms/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?php base_url(); ?>assets/cms/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php base_url(); ?>assets/cms/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php base_url(); ?>assets/cms/plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url(); ?>assets/cms/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/cms/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/cms/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/cms/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>

<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Custom Plugin Js -->
<script src="<?php base_url(); ?>assets/cms/js/admin.js"></script>
<script src="<?php base_url(); ?>assets/cms/js/pages/magazine/magazine.js"></script>
<script>
    mail_json = <?php echo $magazine_json; ?>;
    total = null;
</script>

</body>

</html>