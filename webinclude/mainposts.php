<?php

require_once './connection.php';

$sql = "SELECT * FROM post ORDER BY vote DESC";

$res = mysqli_query($connection, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
}


?>



<div class="main-posts">
    <div class="container-fluide">
        <div class="row m-0">

            <?php foreach ($data as $main) { ?>
               
                <div class="post-masonry col-6 col-sm-4 col-md-3 col-lg-3">
                    <div class="post-thumb">
                        <img src="./images/<?php echo $main["image"] ?>" alt="">

                        <div class="post-hover text-center">
                            <div class="inside">
                                <span class="date"></span>
                                <h4><a href="detailpost.php?id=<?php echo $main ["id"] ?>"><?php echo $main["title"] ?></a></h4>
                                <p><?php echo $main["description"] ?></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.post-masonry -->

                <?php } ?>

                
                
            

        </div>
    </div>