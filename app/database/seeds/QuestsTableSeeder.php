<?php
    
class QuestsTableSeeder extends Seeder {
    
    // generates fake votes for options provided
    private function fake_range_options( $range )
    {
        $options = explode( ',' ,$range );
        $votes   =  0;
        $value   = array();
        $nvalue  = array();
        
        foreach( $options as $option ){
            $option_votes     = rand(1,100); // avoid divide by zero below!
            $value[ $option ] = $option_votes;
            $votes += $option_votes;
        }

        foreach( $options as $option ){
            $pct = ( $value[ $option ] * 100 ) / $votes;
            $nvalue[ $option ] = round( $pct ) ;
        }
        
        return array( 'range'  => $options,
                      'value'  => $value  ,
                      'nvalue' => $nvalue ,
                      'votes'  => $votes  );
    }
    
    // generates fake votes for numeric range provided
    private function fake_range_numeric()
    {
        $min = rand( -100, 100 );
        $max = $min + rand( 0, 200 );
        $range = array( 'min' => $min , 'max' => $max );
        $nvalue= rand(0,100);
        $value = $min + (($max - $min) * $nvalue / 100);
        $votes = rand(0,100);
        
        return array( 'range'  => $range  ,
                      'value'  => $value  ,
                      'nvalue' => $nvalue ,
                      'votes'  => $votes  );
    }
    
    public function run()
    {
        DB::table('quests')->delete();
        $faker = Faker\Factory::create();
        $users =  User::all();
        $limit = count( $users ) - 1;
        
        for( $i = 0; $i < 25; $i++ ){
            
            $owner_ix  = rand( 0, $limit );
            $owner     = $users[ $owner_ix ];
            $type_id   = $i % 3;
            
            $type    = '';
            $val     = array();
            
            // type
            switch( $type_id ){
                
                default  :
                case    0:  $type ='yes_or_no'  ;
                            $vals = $this->fake_range_options( 'Yes,No' );
                            break;
                    
                case    1:  $type='select_option' ;
                            $vals = $this->fake_range_options( 'Rock,Paper,Sissors' );
                            break;
                    
                case    2:  $type='numeric_range'   ;
                            $vals = $this->fake_range_numeric();
                            break;

            }
            
            $name = $faker->name;
            
            switch( rand( 0, 3 ) ){
                default:
                case 0 : $title = 'Does ' . $name . ' have a sister?'; break;
                case 1 : $title = 'Will ' . $name . ' ever marry?'; break;
                case 2 : $title = 'Do you like ' . $name . '?' ; break;
                case 3 : $title = 'Can ' . $name . ' cook?'; break;
            }
            
            $quest = array( 'title'           => $title,
                            'owner'           => $owner->id,
                            'owner_name'      => $owner->name,
                            'owner_photo_url' => $owner->photo_url,
                           
                            'type'  => $type,
                           
                            'range' => $vals[ 'range' ],
                            'value' => $vals[ 'value' ],
                            'nvalue'=> $vals[ 'nvalue'],
                           
                            'votes' => $vals[ 'votes' ],
                    );
            
            $this->command->info( print_r( $quest, true) );
            Quest::create( $quest );
        }
    }
}