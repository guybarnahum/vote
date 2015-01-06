<?php
    
class QuestController extends BaseController {

    public function showQuest($id=null)
    {
        $quest = ($id)? Quest::find( $id ) : null;
        
        if (isset($quest['attributes'])){
            
            $quest = $quest['attributes'];
            $quest[ 'nvalue' ] = unserialize( $quest[ 'nvalue' ] );
            
            return View::make('quests.quest')->with('quest', $quest);
        }
        
        return View::make('errors.missing');
    }
    
    public function showRandomQuest()
    {
        $id = rand(1,20);
        return $this->showQuest( $id );
    }
    
    public function showQuests()
    {
        $quests = Quest::all();
        return View::make('quests.quests')->with('quests', $quests);
    }
}

