<?php 

    namespace grande_distribuzione;

    class ingrosso {
        public $nome_prodotto;
        public $descrizione_prodotto;
        public $prezzo_prodotto;
        public $quantita;

        public function __construct(string $nome_prodotto,string $descrizione_prodotto,float $prezzo_prodotto,int $quantita){
            
            $this->nome_prodotto = strtolower($nome_prodotto);
            $this->descrizione_prodotto = strtolower($descrizione_prodotto);
            $this->prezzo_prodotto = $prezzo_prodotto;
            $this->quantita = $quantita;
            
            session_start();
        }

        public function aggiungi_prodotto(){

            if (!isset($_SESSION['store'])){
                

                $_SESSION['store'] = [];

                $_SESSION['nuovo_prodotto'] = [
                    'Nome prodotto' => $this->nome_prodotto,
                    'Descrizione' => $this->descrizione_prodotto,
                    'Prezzo prodotto' => $this->prezzo_prodotto,
                    'Quantità' => $this->quantita,
                ];

                array_push($_SESSION['store'],$_SESSION['nuovo_prodotto']);
                
            }else{

                $_SESSION['nuovo_prodotto'] = [
                    'Nome prodotto' => $this->nome_prodotto,
                    'Descrizione' => $this->descrizione_prodotto,
                    'Prezzo prodotto' => $this->prezzo_prodotto,
                    'Quantità' => $this->quantita,
                ];


                array_push($_SESSION['store'],$_SESSION['nuovo_prodotto']);
            }
            

            



        }

    }

    $newProduct = new ingrosso($_POST['nome_prodotto'],$_POST['descrizione_prodotto'],
                                $_POST['prezzo_prodotto'],$_POST['quantita_prodotto']);
    $newProduct->aggiungi_prodotto();
    header('Location: ./index.php');

?>