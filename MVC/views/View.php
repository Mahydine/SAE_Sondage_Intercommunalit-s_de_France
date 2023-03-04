<?php

class View{
    private string $titre;
    private string $css;
    private string $file;

    public function __construct($titre, $css, $file)
    {
        $this->titre= $titre;
        $this->css= 'public/css/'.$css;
        $this->file= 'views/View'.$file.'.php';
    }

    public function generate($data){
        function img($name){
            return 'public/img/'.$name;
        }

        $content = $this->generateFile($this->file, $data);
        $view = $this->generateFile('views/template.php', ['titre'=>$this->titre, 'content'=>$content, 'css'=>$this->css]);

        echo $view;
    }

    public function generateFile($file, $data){
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }else{
            throw new Exception('Fichier '.$file. ' introuvable. ');
        }
    }
}

?>