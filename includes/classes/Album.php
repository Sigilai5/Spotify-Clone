<?php
class Album {

    private $con;
    private $id;
    private $title;
    private $artist;
    private $genre;
    private $artworkPath;

    public function __construct($con,$id){
        $this->con = $con;
        $this->id = $id;

        $query = mysqli_query($this->con,"SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($query);

        $this->albumId = $album['id'];
        $this->title = $album['title'];
        $this->artist = $album['artist'];
        $this->genre = $album['genre'];
        $this->artworkPath = $album['artworkPath'];

    }

    public function getAlbumId(){
        return $this->albumId;
    }
    public function getTitle(){
     return $this->title;
    }
    public function getArtist(){
        return $this->artist;
    }
    public function getGenre(){
        return $this->genre;
    }
    public function getArtworkPath(){
        return $this->artworkPath;
    }
    public function getNumberOfSongs() {
        $query = mysqli_query($this->con, "SELECT * FROM Songs WHERE album='$this->id'"); //SELECT COUNT(*) FROM Songs WHERE albums='7'
        return mysqli_num_rows($query);
    }

    public function getSongIds(){

        $query = mysqli_query($this->con, "SELECT id FROM Songs WHERE album='$this->id' ORDER BY albumOrder ASC");

        $array = array();

        while ($row = mysqli_fetch_array($query)){
            array_push($array, $row['id']);
        }

        return $array;

    }



}


?>