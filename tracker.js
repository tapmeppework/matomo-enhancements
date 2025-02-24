(() => {
	try {
		window._paq = window._paq || []

		if (/Macintosh/i.test(navigator.userAgent) && navigator.maxTouchPoints && navigator.maxTouchPoints > 1) {
			// @source https://github.com/Starker3/MatomoiPadDetector/blob/main/tracker.js
			const
				version = navigator.userAgent.match(/Version\/(\d+(\.\d+)?)/),
				modifiedVersion = version[1].replace(/\./g, '_'),
				ua = navigator.userAgent.replace(
					/\([^)]+\) AppleWebKit/,
					`(iPad; CPU OS ${modifiedVersion}) AppleWebKit`
				)
			window._paq.push(['appendToTrackingUrl', `ua=${ua}`])
		} else if (window.navigator.brave && window.navigator.brave.isBrave()) {
			// @source https://github.com/Starker3/MatomoBraveDetector/blob/main/tracker.js
			const ua = navigator.userAgent.replace("Chrome", "Chrome (Brave)")
			window._paq.push(['appendToTrackingUrl', `ua=${ua}`])
		}
	}
	catch (error) {
		console.error(error)
	}
})()
