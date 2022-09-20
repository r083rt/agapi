<?php
namespace App\Helper;

use Google\Cloud\Firestore\FirestoreClient;

class Firestore
{
    private $db;

    public function __construct()
    {
        $this->db = new FirestoreClient([
            // get key file with full path
            'keyFile' => json_decode(file_get_contents(
                storage_path('app/google/credential.json')
            ), true),
        ]);
    }

    public function getDb()
    {
        return $this->db;
    }

    public function storeVote($data)
    {
        $collection_vote = $this->db->collection('votes');
        $result = $collection_vote->add($data);

        return $result;
    }

    public function updateVote($data)
    {
        $collection_vote = $this->db->collection('votes');
        $query = $collection_vote->where('vote_id', $data['vote_id']);
        $update = $query->update([
            ['path' => 'candidate_id', 'value' => $data['candidate_id']],
        ]);
    }

    public function storeCandidate($data)
    {
        $collection_candidate = $this->db->collection('candidates');
        $result = $collection_candidate->add($data);

        return $result;
    }

    public function deleteCandidate($id)
    {
        $collection_candidate = $this->db->collection('candidates');
        $query = $collection_candidate->where('candidate_id', $id);

        return $query;
    }

    public function updateCandidate($data)
    {
        $collection_candidate = $this->db->collection('candidates');
        $query = $collection_candidate->where('candidate_id', $data['id']);
        $update = $query->update([
            ['path' => 'user_id', 'value' => $data['user_id']],
            ['path' => 'title', 'value' => $data['value']],
            ['path' => 'description', 'value' => $data['description']],
        ]);

        return $update;
    }

}
