<?php
Class Kqsx_model extends MY_Model
{
    var $table = 'kqsx';
    function listlogkqsx()
    {
        $sort_order = 'desc';
        $sort_by = 'creatdate';
        $q = $this->db->select('*')
            ->from('kqsx')
            ->order_by($sort_by, $sort_order)
            ->limit(1000);

        if ($this->input->post('action')) {
            $q->like('status', $this->input->post('action'));
        }
        if ($this->input->post('fromDate') && $this->input->post('toDate')) {
            $time = get_time_between_day($this->input->post('fromDate'), $this->input->post('toDate'));
            $q->where("DATE_FORMAT(`creatdate`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        //nếu dữ liệu trả về hợp lệ
        $ret['rows'] = $q->get()->result();
        return $ret;
    }


}