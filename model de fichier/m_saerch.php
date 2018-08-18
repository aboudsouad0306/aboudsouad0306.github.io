<?php
/******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : [PHP5] Moteur de recherche II                             */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts178-PHP.htm              */
/* Auteur         : R@f                                                       */
/* Date édition   : 24 Jan 2009                                               */
/*                                                                            */
/******************************************************************************/
?>
/* FORMULAIRE */
<form action="" method="post">
<input type="text" name="search_text" size="100" style="font-size: 12px;"
 value=""><br><br>
<input type="radio" name="search_option" value="all" style="border: none;
 font-size: 12px;" checked>Rechercher tous les mots<br>
<input type="radio" name="search_option" value="one" style="border: none;
 font-size: 12px;">Rechercher un de ces mots<br>
<input type="
radio" name="search_option" value="sentence" style="border: none; font-size:
 12px;">Rechercher l'expression exacte
    
<br><br>
<input type="submit" value="Rechercher" name="submit" style="font-size: 12px;
 position: relative; left: 20px;">
</form>

/* CLASS */
<?php
class dbSearch
{
  // mots et expressions à chercher
  private $words;
  
  // séparateur
  private $sep;
  
  // option de recherche
  private $option;
  
  // nombre de mots
  private $count_words;
  
  // clause where
  private $query_where = '';
  
  /*
      __construct()
      Paramètres:
        - $search_option: option choisie
        - $search_text: texte de recherche entré
      Retour:
        void
  */
  public function __construct( $search_option, $search_text )
  {
    $this->query_prepared = 1;
    
    // option de recherche
    $this->option = $search_option;
    
    // recherche en ET
    if( $this->option  == 'all' )
    {
      $this->sep = ' AND ';
      $this->option = 1;
      $this->words = explode( ' ', addslashes( $search_text ) );
      $this->count_words = count( $this->words );
    }
    // recherche en OU
    else if( $this->option  == 'one' )
    {
      $this->sep = ' OR ';
      $this->option = 2;
      $this->words = explode( ' ', addslashes( $search_text ) );
      $this->count_words = count( $this->words );
    }
    // phrase exacte
    else
    {
      $this->option = ;
      $this->words[] = addslashes( $search_text );
    }
  }
  
  /*
      mkQuery()
      Crée la requête MySQL
      Paramètres:
        - $table ( string ): table à utiliser 
        - $select ( string ): les champs que l'on récupère
        - $champs ( string si 1 champ, array si plusieurs ): champs dans
 lesquels s'effectue la recherche 
        - $order ( string ): critère de classement ; pas de classement si vide
        - $sens ( string: asc ou desc ): sens du classement 
        - $limit_start ( entier ): pour le LIMIT
        - $limit_nb ( entier ): pour le LIMIT ; si 0, pas de clause LIMIT
      Retour:
        void
  */
  public function mkQuery( $table, $select, $champs, $order, $sens, $limit_start
, $limit_nb )
  {
    $this->query_where = '';
    
    if( !is_array( $champs ) )
      $champs = array( $champs );
      
    $count_champs = count( $champs );
    
    // si recherche en ET ou OU
    if( $this->option )
    {
      for( $i = ; $i < $this->count_words; $i++ ) // boucle sur les mots
      {
        // si pas première itération
        if( $i )
          $this->query_where .= $this->sep;
          
        $this->query_where .= '( ';
        
        for( $j = ; $j < $count_champs; $j++ ) // boucle sur les champs
        {
          if( $j )
            $this->query_where .= ' OR ';
            
          $this->query_where .= '`' . $champs[ $j ] . '` LIKE \'%' . $this->
words[ $i ] . '%\'';
          
        } 
// for( $j = 0; $j < $this->count_words; $j++ ) // boucle sur les champs
        
        $this->query_where .= ' )';
      } // for( $i = 0; $i < $count_champs; $i++ ) // boucle sur les mots
    }
    else // recherche phrase exacte
    {
      for( $i = ; $i < $count_champs; $i++ ) // boucle sur les champs
      {
        if( $i )
          $this->query_where .= ' OR ';
          
        $this->query_where .= $champs[$i] . ' LIKE \'%' . $this->words[] . 
'%\' ';
      } // for( $i = 0; $j < $count_champs; $i++ ) // boucle sur les champs
    } // else // recherche phrase exacte
    
    // construction de la requête finale
    $sql = array( 'select' => 'SELECT ' . $select . ' FROM ' . $table . 
' WHERE ' . $this->query_where, 'count' => 'SELECT count(*) FROM ' . $table . 
' WHERE ' . $this->query_where );
    
    if( !empty( $order ) )
      $sql['select'] .= ' ORDER BY ' . $order . ' ' . $sens;
    $this->query_where = $sql['select'];
    if( $limit_nb )
      $sql['select'] .= ' LIMIT ' . $limit_start . ', ' . $limit_nb;
    
    return $sql;
  }
  
  /*
      getWhere()
      Récupération de la clause where
      Paramètres:
        void
      Retour:
        string
  */
  public function getQuery()
  {
    return $this->query_where;
  }
}

if( isset( $_POST['submit'] ) )
{
  $search = $_POST['search_text'];
  
  $time_debut = explode(' ', microtime());
  $time_debut = $time_debut[1] + $time_debut[];
  
  $s = new dbSearch( $_POST['search_option'], $_POST['search_text'] );
  
  $sql = $s->mkQuery( 'news', 'id', array( 'titre', 'texte' ), 'id', 'desc', , 
10 );
  echo $sql['select'] . '<br /><hr />';
  
  $sql = $s->mkQuery( 'gags', 'id', array( 'champ1', 'champ2', 'champ3' ), 'id',
 'asc', , 10 );
  echo $sql['select'] . '<br /><hr />';
}
else
  $search = '';
  
?>