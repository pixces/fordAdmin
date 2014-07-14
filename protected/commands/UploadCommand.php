<?php
/**
 * Created by IntelliJ IDEA.
 * User: zainulabdeen
 * Date: 06/04/14
 * Time: 2:46 PM
 * To change this template use File | Settings | File Templates.
 */
class UploadCommand extends CConsoleCommand{

    private $startTime;
    private $runTime;

    public function run($args){
        $this->start();
        $contents = $this->getContent();

        if ($contents){
            foreach($contents  as $content){

                $contentId = $content['id'];
                $videoResponse = $this->processVideo();

                $params = array();
                if ($videoResponse){
                    $status = 'approved';
                    $params = array(
                        'media_id' => "81ll2B4zl1g",
                        'media_url' => 'http://youtu.be/81ll2B4zl1g',
                        'alternate_url' => $content['media_url'],
                        'source' => 'youtube',
                        'thumb_image' => 'https://i1.ytimg.com/vi/81ll2B4zl1g/hqdefault.jpg',
                        'status' => $status,
                    );
                } else {
                    //video processing not done
                    $status = 'error';
                    $params = array(
                        'status' => $status
                    );
                }

                //update the content based on the processing resilt
                //now update the content details
                if ( $this->updateContent($contentId,$params) ){
                    //now send the mail to the user
                    $this->sendEmail($status,$content);

                }
            }
        } else {
            //confirm that there is nothing to execute
            Yii:log("No video content for processing. Exiting app..");
        }
       $this->stop();
     }
    private function start(){
        $this->startTime = time();
    }

    private function stop(){
        $this->runTime = time() - $this->startTime;
        Yii::log("Run time: ".$this->runTime." sec.");
    }

    /**
     * Get the list of content
     * for the given type and status
     * @param string $type
     * @param string $status
     * @return array|bool
     */
    private function getContent($type = 'video',$status = 'processing'){

        $criteria = new CDbCriteria; //(array('gallery_id'=>  $this->data['gallery_id']));
        $criteria->condition = "t.is_ugc = 1 AND t.status = '".$status."' AND t.type = '".$type."' ";
        $criteria->with = 'user';

        //get entries from Content table where
        $contents = Content::model()->findAll($criteria);
        if ($contents){
            $contentList = array();
            foreach($contents as $content){
                $contentList = array_merge($contentList,array(array(
                    'id'        => $content->id,
                    'user_id'   => $content->user->id,
                    'name'      => $content->user->first_name." ".$content->user->last_name,
                    'email'     => $content->user->email,
                    'title'     => $content->title,
                    'media_url' => $content->media_url,
                    'profile_url'=>"https://grabyourdream.com/user/profile/".$content->user->id."?lang=en&env=base",
                )));
            }
            return $contentList;
        } else {
            Yii::log('No video content found to process');
            return false;
        }
    }



    /**
     * Metho to implement actual video processing
     * @return bool
     */
    private function processVideo(){





    }


    /**
     * Method to update content information
     * based on the output from video processing
     * based on the
     * @param $id
     * @param $params
     * @return bool
     */
    private function updateContent($id,$params){
        if ($id){
            $content = Content::model()->findByPk($id);
            foreach($params as $key => $val){
                if($content->hasAttribute($key)){
                    $content->{$key} = $val;
                }
            }

            if ($content->save()){
                return true;
            } else {
                Yii::log("Cannot update content details ".$id.": ".$content->getErrors());
                return false;
            }
        } else {
            Yii::log("No id specified. Cannot update content");
            return false;
        }
    }

    private function sendEmail($type,$data){

        if ($type == 'approved'){
            $view = 'submission-accepted';
            $subject = "[GrabYourDream] Your submission is approved.";
        } else if ($type == 'rejected'){
            $view = 'submission-rejected';
            $subject = "[GrabYourDream] Your submission is rejected.";
        }

        $to = $data['email'];
        $to = 'pixces@gmail.com';

        $mail = new Mailer();
        if ( $mail->sendMail($view,$to,$subject,$data) ){
            return true;
        } else {
            return false;
        }
    }
}
