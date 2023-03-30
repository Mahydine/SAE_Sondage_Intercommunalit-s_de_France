<?php

class View{
    private string $titre;
    private string $css;
    private string $file;
    private string $script;

    public function __construct($titre, $css, $file, $script)
    {
        $this->script = 'public/js/'.$script;
        $this->titre= $titre;
        $this->css= 'public/css/'.$css;
        $this->file= 'views/View'.$file.'.php';
    }

    public function img($name) {
        return 'public/img/' . $name;
    }

    public function generate($data){
        $content = $this->generateFile($this->file, $data);
        $view = $this->generateFile('views/template.php', ['titre'=>$this->titre, 'content'=>$content, 'css'=>$this->css, 'script'=>$this->script]);

        echo $view;
    }

    public function generateFile($file, $data){
        if(file_exists($file)){
            extract($data);
            ob_start();
            require_once $file;
            return ob_get_clean();
        }else{
            throw new Exception('Fichier '.$file. ' introuvable. ');
        }
    }
}

?>