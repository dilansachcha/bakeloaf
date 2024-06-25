<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `foods`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `name` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id` = '" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_id` = '" . $select . "'";
}

?>

<div class="row d-flex justify-content-center">
    <div class="offset-lg-1 col-12 col-lg-10  ">
        <div class="row gap-5">

            <?php


            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 10;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                ?>

                <div class="card col-8 col-lg-2 mt-2 mb-2 divchange " style="width: 18rem;">

                    <?php

                    $image_rs = Database::search("SELECT * FROM `food_images` WHERE `food_id` = '" . $selected_data["id"] . "'");
                    $image_data = $image_rs->fetch_assoc();

                    ?>

                    <img src="<?php echo $image_data["path"]; ?>" class="card-img-top img-thumbnail"
                        style="height: 150px; width: auto;" />
                    <div class="card-body ms-0 m-0 text-center">
                        <h5 class="card-title fs-6">
                            <?php echo $selected_data["name"]; ?>
                        </h5>
                        <span class="card-text text-primary">Rs.
                            <?php echo $selected_data["price"]; ?> .00
                        </span> <br />

                        <?php

                        if ($selected_data["status"] === "Available") {

                            ?>

                            <span class=" text-success fw-bold">Available</span> <br />


                            <?php

                        } else {

                            ?>

                            <span class=" text-danger fw-bold">Not Available</span> <br />


                            <?php

                        }

                        ?>

                        <button onclick="singleProductView(<?php echo $selected_data['id']; ?>);"
                            class=" btn btn-outline-warning col-12 mt-2">View</button>
                    </div>
                </div>



                <?php

            }
            ?>



        </div>


        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-3 mb-3 ">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno <= 1) {
                            echo ("#");
                        } else {
                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                        } ?> aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php

                    for ($x = 1; $x <= $number_of_pages; $x++) {
                        if ($x == $pageno) {
                            ?>
                            <li class="page-item active">
                                <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);">
                                    <?php echo $x; ?>
                                </a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="page-item">
                                <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);">
                                    <?php echo $x; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }

                    ?>

                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                            echo ("#");
                        } else {
                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                        } ?> aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!--  -->

    <!--  -->
</div>