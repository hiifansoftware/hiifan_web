<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 4/3/13 1:44 AM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class pageModel extends SaanModel
{
    public function addContactEntry($dataArray)
    {
        if(is_array($dataArray))
        {
            return $this->db->query_insert('site_contact_details',$dataArray);
        }
    }
}
