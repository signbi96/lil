<?php 
namespace App\Core;
 abstract class Model extends Db{
     protected abstract static function tableName();



       public static function query(string $sql, array $data=[],bool $single=false){
               $bdd = parent::openConnexion();
               $req = $bdd->prepare($sql);
               $req->execute($data);
               $req->setFetchMode(\PDO::FETCH_CLASS,get_called_class());
               if($single){
               $data= $req->fetch();
               }else{
                  $data= $req->fetchAll();
               }
            $req->closeCursor();
            return $data  ;
         }

     

     
      public static function all(){
            //1-Connexion a la BD
            $bdd = parent::openConnexion();
           // dd(self::tableName());
              $req = $bdd->prepare('SELECT * FROM '.static::tableName());
            //3- EFFECTUE LA REQUETE ==> CHANGE 2
              $req->execute();
            //4- FIN DE LA REQUETE ==> CHANGE 3
            $data=$req->fetchAll(\PDO::FETCH_CLASS,get_called_class());
               $req->closeCursor();
              return $data;
        }
        public static function all2(int $etatc){
         $bdd = parent::openConnexion();
          $req = $bdd->prepare('SELECT * FROM '.static::tableName().' WHERE etatc = :etatc');
          $req->bindValue(':etatc',$etatc);
          $req->setFetchMode(\PDO::FETCH_CLASS,get_called_class());
          //$req->execute(['id' => $id]);
          $req->execute();
          $data=$req->fetchAll(\PDO::FETCH_CLASS,get_called_class());
          $req->closeCursor();
          return $data; 
        }

        public static function find($id){
          $bdd = parent::openConnexion();
          $req = $bdd->prepare('SELECT * FROM '.static::tableName().' WHERE id = :id');
          $req->bindValue(':id',$id);
          $req->setFetchMode(\PDO::FETCH_CLASS,get_called_class());
          //$req->execute(['id' => $id]);
          $req->execute();
          $data=$req->fetch();
          $req->closeCursor();
          return $data; 
       }

      
       public static function create($data){ 
          $bdd = parent::openConnexion();
          $req = $bdd->prepare('INSERT INTO '.static::tableName().' ('.implode(',',array_keys($data)).') VALUES (:'.implode(',:',array_keys($data)).')');
          $req->execute($data);
          $req->closeCursor();
          return self::find($bdd->lastInsertId());
       }

       public static function updated($id,$data){
         $bdd = parent::openConnexion();
         $req = $bdd->prepare('UPDATE '.static::tableName().' SET '.implode(',',array_keys($data)).' = :'.implode(',',array_keys($data)).' WHERE id = :id');
         $req->bindValue(':id',$id);
         $req->execute($data);
         $req->closeCursor();
         return;
      }

       
       public static function deleted($id){    
          $bdd = parent::openConnexion(); 
          $req = $bdd->prepare('DELETE FROM '.static::tableName().' WHERE id = :id');
          $req->bindValue(':id',$id);
          $req->execute();
          $req->closeCursor();
          return;
       }

       public static function ExecuteUpdate(string $sql,array $data=[]){
         $bdd = parent::openConnexion();
         $req = $bdd->prepare($sql);
         $req->execute($data);
         if (str_starts_with(strtolower($sql),"insert")){
             $data = $bdd->lastInsertId();      
         }else{
            $req->rowCount();
         }
         $req->closeCursor();
         return $data;
      }

     
   

        

}

 



