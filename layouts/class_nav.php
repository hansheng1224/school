<nav>
    <ul class="class-list">
    <?php
        $sql="SELECT `id`,`code`,`name` FROM `classes`";
        $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach($classes as $class){
            echo "<li><a href='?code={$class['code']}'>{$class['name']}</a></li>";
        }
    ?>    
    </ul>
    </nav>