<?php
/**
 * Created by IntelliJ IDEA.
 * User: zainulabdeen
 * Date: 16/03/14
 * Time: 6:04 PM
 * To change this template use File | Settings | File Templates.
 */
class WebUser extends CWebUser{

    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        echo $role = $this->getState("role");
        exit;
        if ($role === 'superadmin') {
            return true; // admin role has access to everything
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }



}