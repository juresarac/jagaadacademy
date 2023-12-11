<?php require_once __DIR__ . '/../Templates/header.php'; ?>
<form action="transfer.php" method="post">
    <div class="form-group" style="margin: 30px">
        <label for="source_account">Source Account:</label>
        <select id="source_account" name="source_account" class="form-control">
            <?php foreach ($accounts as $account): ?>
                <option value="<?php echo $account['account_number'] ?>">
                    <?php echo $account['account_number']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <div class="form-group" style="margin: 30px">
        <label for="destination_account">Destination Account:</label>
        <select id="destination_account" name="destination_account" class="form-control">
            <?php foreach ($accounts as $account): ?>
                <option value="<?php echo $account['account_number'] ?>">
                    <?php echo $account['account_number'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <div class="form-group" style="margin: 30px">
        <label for="amount">Transfer Amount:</label>
        <input type="number" id="amount" name="amount" class="form-control" step="0.01" min="0" required>
    </div>
    <br>
    <div class="form-group" style="margin: 30px">
        <input type="submit" class="btn btn-primary" value="Transfer">
    </div>
</form>
<?php require_once __DIR__ . '/../Templates/footer.php'; ?>