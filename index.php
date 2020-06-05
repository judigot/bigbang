<?php

header("Location: " . (file_exists("dist") ? "dist" : "src"));
