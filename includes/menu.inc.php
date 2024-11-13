<?php

Class Menu {
    public static $menu = array();
    
    public static function setMenu() {

        self::$menu = array();
        $connection = Database::getConnection();
        $stmt = $connection->query("SELECT url, nev, jog FROM menu WHERE jog LIKE '".$_SESSION['userlevel']."'");

        while($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
            self::$menu[$menuitem['url']] = array($menuitem['nev'], $menuitem['jog']);
        }

    }
    
    public static function getMenu($sItems) {
       
        
        $menu = "<ul class=\"menu\">";
        foreach(self::$menu as $menuindex => $menuitem)       
        {
            $menu .= "<li><a href='" . SITE_ROOT . $menuindex . "'>" . $menuitem[0] . "</a></li>";

        }

        $menu.="</ul>";
        
        
        
        return $menu;
    }
}

Menu::setMenu();
?>
