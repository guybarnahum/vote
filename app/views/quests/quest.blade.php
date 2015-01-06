@extends('layouts.base')

@if (     $quest[ 'type' ] == 'yes_or_no' )
    @include( 'quests.quest_yes_or_no', array( 'quest' => $quest ))
@elseif ( $quest[ 'type' ] == 'select_option' )
    @include( 'quests.quest_select_option', array( 'quest' => $quest ))
@elseif ( $quest[ 'type' ] == 'numeric_range' )
    @include( 'quests.quest_numeric_range', array( 'quest' => $quest ))
@endif

@stop