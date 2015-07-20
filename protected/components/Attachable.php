<?php
/**
 *
 */
class Attachable extends CActiveRecordBehavior
{

  public $attachmentTable='{{attachment}}';

  public function isVisible( $user ) {

  }

  public function isDeletable( $user ) {

  }

  public function attachFile( $file ) {
    $owner=$this->getOwner();
    $ownerMetaData=$owner->getMetaData();
    $attachement=new Attachment;

    $data=array(
      'entityid'=>$owner->primaryKey,
      'entityname'=>get_class( $owner ),
      'filename'=> $file->name,
      'filesize'=>$file->size,
      'mimetype'=>$file->type,
      'create_user'=>!Yii::app()->user->isGuest ? Yii::app()->user->id : null,
      'tempfile'=>$file->tempName

    );

    $attachement->attributes=$data;
    return $attachement->save( false );

  }

  public function attachFiles( $files=array() ) {
    foreach ( $files as $file ) {
      $this->attachFile( $file );
    }
  }

  public function loadAttachment() {
    $owner=$this->getOwner();
    $attachment=Attachment::model()->find( array(
        'condition'=>'entityname=:e AND entityid=:eid',
        'params'=>array(
          ':e'=>get_class( $owner ),
          ':eid'=>$owner->primaryKey
        )
      )
    );
    return $attachment;
  }

  public function loadAttachments() {
    $owner=$this->getOwner();
    $attachments=Attachment::model()->findAll( array(
        'condition'=>'entityname=:e AND entityid=:eid',
        'params'=>array(
          ':e'=>get_class( $owner ),
          ':eid'=>$owner->primaryKey
        )
      )
    );
    return $attachments;
  }
}
