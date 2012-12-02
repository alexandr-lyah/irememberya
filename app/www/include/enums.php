<?php

class ShareType {
    const LI = "LinkedIn";
    const FACEBOOK = "Facebook";
    const TWITTER = "Twitter";
}

class Pages {
    const PUBLIC_PROFILE = "Public Profile";
    const DASHBOARD = "Dashboard";
    const STATS = "Statistics";
    const LEADERBOARD = "LeaderBoard";
    const ADD_SKILLS = "Add Skills";
    const OTHER = "Other";

    public static function toArray() {
        return array ("PUBLIC_PROFILE" => self::PUBLIC_PROFILE,
                      "DASHBOARD" => self::DASHBOARD,
                      "STATS" => self::STATS,
                      "LEADERBOARD" => self::LEADERBOARD,
                      "ADD_SKILLS" => self::ADD_SKILLS,
                      "OTHER" => self::OTHER);
    }
}

class Actions {
    // User skipped a connect. Saves in arg1 the user_id of the skipped connection
    const SKIP_ADD_SKILLS_CONNECTION = 'SKIP_ADD_SKILLS_CONNECTION';
}
?>