<?php

class DataLayer
{
    function getOutdoor()
    {
        return array("tv", "movies", "cooking", "board games", "puzzles",
            "reading", "playing cards", "video games");
    }

    function getIndoor()
    {
        return array("hiking", "biking", "swimming", "collecting",
            "walking", "climbing");
    }
}
