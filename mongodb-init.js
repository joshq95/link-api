db.createUser(
    {
        user: "linktree",
        pwd: "linktree",
        roles: [
            {
                role: "readWrite",
                db: "linktree"
            }
        ]
    }
);