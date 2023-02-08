<?php
header('Accsess-controle-Allow-Origne: *');
header('Content-type: aplication/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-headers: access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Autorization,X-Requested');


class UserController extends User
{ 
    public function read_data()
    {
        $result  = $this->read();

        $num  = mysqli_num_rows($result);

        if ($num > 0){
            $post_arr = array();
            $post_arr['data'] = array();

            while ($row  = mysqli_fetch_assoc($result)){
                extract($row);

                $post_item = array(
                    'id_user' => $id_user,
                    'nom' => $nom,
                    'prenom' => $prenom,
                );
                array_push($post_arr['data'],$post_item);
            }
            echo json_encode($post_arr);
        }
        else {
            echo json_encode(array('message' => 'no data found'));
        }
        
    }


    public function read_single_data($id_user)
    {
        $this->readOne($id_user);
    
        $post_arr = array(
            'id_user' => $this->id_user,
            'nom' => $this->nom,
            'prenom' => $this->prenom
        );
        print_r(json_encode($post_arr));

    }


    public function add()
    {
        $data = json_decode(file_get_contents("php://input"));

        $this->id_user = $data->id_user ; 
        $this->nom = $data->nom ; 
        $this->prenom = $data->prenom ; 
        
        if($this->insert()){
            echo json_encode(array('message => data saved' ));
        }else{
            echo json_encode(array('message => data not saved' ));
        }
    }


    public function delete($id_user)
    {
        if($this->remove($id_user)){
            echo json_encode(array('message = > data deleted'));
        }else {   
            echo json_encode(array('message = > data not deleted'));
        }
    }

    public function update()
    {
        $data  = json_decode(file_get_contents("php://input"));

       
        $this->id_user = $data->id_user ; 
        $this->nom = $data->nom ; 
        $this->prenom = $data->prenom ; 
        
        if($this->update()){
            echo json_encode(array('message = > data updated'));
        }else {   
            echo json_encode(array('message = > data not updated'));
        }
    }
    
    
}