## app/Models/User.php
```
 public function canAccessPanel(Panel $panel) : bool
    {
        return $this->hasRole(['Admin','User']);
    }
```
