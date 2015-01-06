<?php
    
class VotesTableSeeder extends Seeder {
    
    private function fake_option_vote( &$quest, $user_id )
    {
        $value    = rand(0,$quest[ 'votes' ]);
        $sum_votes= 0;
        
        foreach( $quest[ 'value' ] as $option => $votes ){
            $sum_votes += $votes;
            if ( $value < $sum_votes ){
                break;
            }
        }
        
        // remove one vote from selected option
        $quest[ 'value' ][ $option ]--;
        $quest[ 'votes' ]--;
        
        $vote = array( 'owner' => $user_id      ,
                       'quest' => $quest[ 'id' ],
                       'value' => $option       );
        
        return $vote;
    }
    
    private function fake_numeric_vote( &$quest, $user_id )
    {
        // remove one vote from selected option
        $min = $quest[ 'range' ][ 'min' ];
        $max = $quest[ 'range' ][ 'max' ];
        $val = rand( $min, $max);

        $quest[ 'votes' ]--;

        $vote = array( 'owner' => $user_id      ,
                       'quest' => $quest[ 'id' ],
                       'value' => $val          );
        
        return $vote;
    }
    
    public function run()
    {
        DB::table('votes')->delete();
        $quests = Quest::all();
        $users  = User::all();
        
        $q = array();
        
        foreach( $quests as $quest ){
            $q[] = array( 'id'   => $quest['attributes']['id'   ],
                          'type' => $quest['attributes']['type' ],
                          'votes'=> $quest['attributes']['votes'],
                          'range'=> unserialize( $quest['attributes']['range'] ),
                          'value'=> unserialize( $quest['attributes']['value'] )
                );
        }
        
        // $this->command->info( "Selected : " . print_r( $q, true) );
        
        $users_cc = count( $users  );
        $quest_cc = count( $q );
        
        while( $quest_cc ){
            
            $vote     = null;
            
            $quest_id = rand( 0, $quest_cc - 1 );
            $user_id  = rand( 0, $users_cc - 1 );
            
            // $this->command->info( "Selected : " . print_r( $q[ $quest_id ], true) );
            
            switch( $q[ $quest_id ][ 'type'] ){
                    
            default : $this->command->info( " unsupported type :" );
                      $this->command->info( print_r( $q[ $quest_id ], true) );
                      $q[ $quest_id ][ 'votes' ] = 0;
                      break;
                    
            case 'yes_or_no'     :
            case 'select_option' :
                    $vote = $this->fake_option_vote( $q[ $quest_id ], $user_id );
                    break;
                    
            case 'numeric_range' :
                    $vote = $this->fake_numeric_vote( $q[ $quest_id ], $user_id );
                    break;
            }
            
            // done seeding votes for quest
            if ( $q[ $quest_id ][ 'votes'] <= 0 ){
                $this->command->info( "Done with quest : " . print_r( $q[ $quest_id ], true )  );
                unset(  $q[ $quest_id ] );
                $q = array_values( $q );
                $quest_cc--;
            }
            
            if ( $vote != null ){
               //  $this->command->info( print_r( $vote, true) );
                Vote::create( $vote );
            }
        }
    }
}