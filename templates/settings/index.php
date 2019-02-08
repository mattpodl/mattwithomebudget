<div id="app-settings">
	<div id="app-settings-header">
		<button class="settings-button"
				data-apps-slide-toggle="#app-settings-content"
		></button>
	</div>
	<div id="app-settings-content">
		<form action="/index.php/apps/mattwithomebudget/params" method="post" autocomplete="off">
		<label>Liczba dni w okresie podsumowania</label>
		<input type="text" name="summaryPeriod" placeholder="30" required>
		<input type="submit" value="Ustaw">
		</form>
	</div>
</div>
